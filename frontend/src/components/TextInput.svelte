<script>
    export let inputName, inputType;
</script>

<div class="py-2">
    <label class="font-mono w-full" for={inputName}>{inputName.charAt(0).toUpperCase() + inputName.slice(1)}: </label>
    <input class="font-mono w-full" type={inputType} name={inputName}/>
</div>