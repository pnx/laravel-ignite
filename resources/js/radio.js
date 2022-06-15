
export const radio = (data) => {
    return {

        // Data
		// ----------------
        value: data.value ?? null,

        // Methods
		// ----------------
        init() { this.$watch('value', v => { this.$refs.input.dispatchEvent(new Event('input')); })},
        select(value) { this.value = value },
        isSelected(value) { return value == this.value },
    }
}
