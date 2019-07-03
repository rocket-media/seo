<template>
	<div :class="[$style.wrap, 'field']">
		<div class="heading">
			<label>
				{{ 'Image'|t }}
			</label>
			<div class="instructions">
				<p>Some instructions</p>
			</div>
		</div>
		<button @click="onImageClick" type="button">Select an Image</button>
		<p>[TODO: Allow selecting of fallback image + field to pull from (if they want to pull from an existing field)]</p>

		<div class="heading">
			<label>
				{{ 'Title'|t }}
			</label>
			<div class="instructions">
				<p :inner-html.prop="'Create a token for each part of your title. Clicking the lock will prevent the user from editing the contents of that token. Tokens use the same syntax as [Dynamic Entry Titles](https://docs.craftcms.com/v3/sections-and-entries.html#dynamic-entry-titles). They can be dragged to re-order.'|t|md"></p>
			</div>
		</div>
		<p>[TODO: Token based title field]</p>

		<div class="heading">
			<label :for="'desc_' + id">
				{{ 'Description'|t }}
			</label>
			<div class="instructions">
				<p :inner-html.prop="'This supports the same syntax as [Dynamic Entry Titles](https://docs.craftcms.com/v3/sections-and-entries.html#dynamic-entry-titles).'|t|md"></p>
			</div>
		</div>
		<textarea
			:id="'desc_' + id"
			:class="[$style.desc, 'text fullwidth']"
			@input="onTextareaInput"
			rows="4"
			placeholder="i.e. {myDescriptionField}"
		></textarea>
	</div>
</template>

<script>
	export default {
		name: 'seo-field-settings',

		data () {
			return {
				id: (Math.random() * 0xFFFF << 0).toString(16),
			};
		},

		methods: {
			onImageClick () {
				// TODO: this
			},

			onTextareaInput ({ target }) {
				target.style.height = '';
				target.style.height = (target.scrollHeight + 2) + 'px';
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
	.desc {
		font-family: "Fira Code", "Consolas", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace;
		font-variant-ligatures: contextual;
		resize: none;
	}
</style>
