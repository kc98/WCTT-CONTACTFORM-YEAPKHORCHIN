<script>
	import TextInput from "./components/Inputs/TextInput.svelte";
	import EmailInput from "./components/Inputs/EmailInput.svelte";
	import TextArea from "./components/Inputs/TextArea.svelte";
	import Alert from "./components/Alerts/Alert.svelte";
	import Axios from "axios";

	let name, email, description, message, alertVisible = false, isErrorAlert = true;

	const onSubmit = async () => {
		message = '';

		// let response = await storeForm();
		name = email = description = null;

		// if (response.status != 201) {
		// 	let data = response.data;
		// 	data.forEach(item =>
		// 		message += item.message + ' '
		// 	);
		// 	toggleAlertVisible();
		// 	return;
		// }

		isErrorAlert = false;
		message = 'Thank you for filling out your information!';

		toggleAlertVisible();
		return;
	};

	const storeForm = async () => {
		return Axios.post(
            'http://localhost:8080/form',
            {name: name, email: email, description: description},
            {
                headers: {
					'Content-Type': 'application/json',
                    Accept: "application/json",
                },
            }
        ).then(async (response) => {
			return response;
		}).catch((error) => {
			return error.response;
		});
	}

	const toggleAlertVisible = () => {
        alertVisible = !alertVisible;
    }
</script>

<main>
	<div class="container mx-auto max-w-xl px-12 py-8 my-8 rounded-xl bg-slate-100">
		<h1 class="font-mono pb-3 text-center">Contact Us</h1>
		<form class="contactForm" on:submit|preventDefault={onSubmit} id="contactForm">
			<Alert message={message} visible={alertVisible} closeAlert={toggleAlertVisible} isErrorAlert={isErrorAlert}/>
			<TextInput inputName="name" bind:value={name}/>
			<EmailInput inputName="email" bind:value={email}/>
			<TextArea inputName="description" bind:value={description}/>
			<button type="submit" id="submitButton" class="inline-block my-2 px-6 py-3 w-full bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
		</form>
	</div>
</main>

<style lang="postcss" global>
	@tailwind base;
	@layer base {
		h1 {
			@apply text-2xl;
		}
	}
	@tailwind components;
	@tailwind utilities;
</style>