<script>
    export let inputName, value, required;
</script>

<div class="py-2">
    <label class="font-mono w-full" for={inputName}>{inputName.charAt(0).toUpperCase() + inputName.slice(1)}: </label>
    <input class="font-mono w-full" type="text" name={inputName} bind:value={value} required={required}/>
</div>