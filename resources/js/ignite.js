
const select_dropdown = (data) => {
	return {

		// Data
		// ----------------
		show: false,
		value: data.value ?? null,
		display: data.display ?? '',
		placeholder: data.placeholder ?? 'Select an option',

		// Methods
		// ----------------
        init() { this.$watch('value', v => { this.$refs.input.dispatchEvent(new Event('input')); })},

		// Helper methods.
		open() { this.show = true },
		close() { this.show = false },
		toggle() { this.show = !this.show },
		isPlaceholderSelected() { return this.value == null },

		// select an option.
		select(value, display) {
			this.value = value;
			this.display = display;
			this.close();
		},

		// Select placeholder
		selectPlaceholder() {
			this.select(null, this.placeholder)
		}
	}
}

const checkbox = (data) => {
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

export { select_dropdown, checkbox };
