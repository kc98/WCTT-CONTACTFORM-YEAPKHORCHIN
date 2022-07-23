<script>
	import TextInput from "./components/TextInput.svelte";
	import TextArea from "./components/TextArea.svelte";
</script>

<main>
	<div class="container mx max-w-xl px-6">
		<TextInput inputName="name" inputType="text"/>
		<TextInput inputName="email" inputType="email"/>
		<TextArea inputName="description"/>
		<button type="button" class="inline-block my-2 px-6 py-3 w-full bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
	</div>
</main>

<style lang="postcss" global>
	@tailwind base;
	@tailwind components;
	@tailwind utilities;
</style>