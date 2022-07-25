<script>
	import TextInput from "./components/Inputs/TextInput.svelte";
	import EmailInput from "./components/Inputs/EmailInput.svelte";
	import TextArea from "./components/Inputs/TextArea.svelte";
	import ErrorAlert from "./components/Alerts/ErrorAlert.svelte";
	import Axios from "axios";

	let name, email, description, message, errorAlert = false;

	const onSubmit = async () => {
		console.log(name,email,description);
		errorAlert = !errorAlert;
		let result =  Axios.post(
            'http://localhost:8080/form',
            {name: name, email: email, description: description},
            {
                headers: {
					'Content-Type': 'application/json',
                    Accept: "application/json",
                },
            }
        );

		console.log(result);
	};
</script>

<main>
	<div class="container mx-auto max-w-xl px-12 py-8 my-8 rounded-xl bg-slate-100">
		<h1 class="font-mono pb-3 text-center">Contact Us</h1>
		<form class="contactForm" on:submit|preventDefault={onSubmit} id="contactForm">
			<ErrorAlert message={message} visible={errorAlert} />
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