<template>
	<div :class="[$style.wrap, 'field']">
		<div class="heading">
			<label>Image</label>
			<div class="instructions">
				<p>Some instructions</p>
			</div>
		</div>
		<button @click="onImageClick" type="button">Select an Image</button>
		<p>[TODO: Allow selecting of fallback image + field to pull from (if they want to pull from an existing field)]</p>

		<div class="heading">
			<label>Title</label>
			<div class="instructions">
				<p>Some instructions</p>
			</div>
		</div>
		<p>[TODO: Token based title field]</p>

		<div class="heading">
			<label>Description</label>
			<div class="instructions">
				<p>Some instructions</p>
			</div>
		</div>
		<p>[TODO: Twig field]</p>
	</div>
</template>

<script>
	export default {
		name: 'seo-field-settings',

		methods: {
			onImageClick () {
				console.log('hi');
			},
		},
	};
</script>

<style module lang="less">
	.wrap {
		max-width: 1040px;
		margin-top: 10px;
		padding: 30px;

		background: #fff;
		box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.14);
		border-radius: 5px;
	}
</style>
