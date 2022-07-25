<script>
    export let inputName, value;
</script>

<div class="py-2">
    <label class="font-mono w-full" for={inputName}>{inputName.charAt(0).toUpperCase() + inputName.slice(1)}: </label>
    <input class="font-mono w-full" type="email" name={inputName} bind:value={value}/>
</div>