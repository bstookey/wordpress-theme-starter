wp.domReady(() => {
	wp.blocks.unregisterBlockStyle("core/button", [
		"default",
		"outline",
		"squared",
		"fill",
	]);

	wp.blocks.unregisterBlockStyle("core/separator", ["wide", "dots"]);

	wp.blocks.registerBlockStyle("core/button", [
		{
			name: "default",
			label: "Default",
			isDefault: true,
		},
		{
			name: "button-black",
			label: "Black Button",
		},
		{
			name: "button-yellow",
			label: "Yellow Button",
		},
	]);

	wp.blocks.registerBlockStyle("core/cover", [
		{
			name: "default",
			label: "Default",
			isDefault: true,
		},
		{
			name: "half-background-left",
			label: "Half Background Left",
		},
		{
			name: "half-background-right",
			label: "Half Background Right",
		},
	]);
	wp.blocks.registerBlockStyle("core/group", [
		{
			name: "default",
			label: "Full Width",
			isDefault: true,
		},
		{
			name: "fixed-width",
			label: "Site Width",
		},
	]);
	wp.blocks.registerBlockStyle("core/columns", [
		{
			name: "default",
			label: "Flex Start",
			isDefault: true,
		},
		{
			name: "align-items-center",
			label: "Center",
		},
		{
			name: "align-items-flex-end",
			label: "Flex End",
		},
	]);
});
