<script>
    export let inputName;
</script>

<div class="py-2">
    <label class="font-mono w-full" for={inputName}>{inputName.charAt(0).toUpperCase() + inputName.slice(1)}: </label>
    <textarea class="font-mono w-full" name={inputName}/>
</div>