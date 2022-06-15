
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

export { select_dropdown };
