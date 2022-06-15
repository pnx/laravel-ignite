
export const checkbox = (data) => {
    return {

        // Data
		// ----------------
        checked: data.value ?? null,

        // Methods
		// ----------------
        init() { this.$watch('checked', v => { this.$refs.input.dispatchEvent(new Event('input')); })},
        toggle() { this.checked = ! this.checked },
        isChecked() { return this.checked },
    }
}
