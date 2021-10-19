<template>
	<div>
		<div class="row">
			<div class="col-lg-6">
				<router-link :to="{ name: 'posts.index' }" class="btn btn-success btn-sm mb-4">
					BACK TO LIST
				</router-link>
				<div class="card">
					<div class="card-header">CREATE NEW POSTS</div>
					<div class="card-body">
						<form action="#" method="post" @submit.prevent="storeData">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="" name="title" v-model="form.title" id="title" class="form-control">
								<div v-if="formErrors.title" class="text-danger mt-2">
									{{ formErrors.title[0] }}
								</div>
							</div>
							<div class="form-group">
								<label for="body">Body</label>
								<textarea name="body" id="body" v-model="form.body" class="form-control"></textarea>
								<div v-if="formErrors.body" class="text-danger mt-2">
									{{ formErrors.body[0] }}
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">SAVE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Swal from 'sweetalert2'

	export default {
		data() {
			return {
				form: {
					title: '',
					body: '',
				},

				formErrors: [],
			}
		},

		methods: {
			async storeData() {
				try {
					let response = await axios.post('/api/posts', this.form)
					if (response.status == 200) {
						Swal.fire({
						  icon: 'success',
						  title: response.data.message,
						  text: '',
						})
						
						this.form.title = ''
						this.form.body = ''
						this.formErrors = []

						// window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/')
						this.$router.push({ name: 'posts.index' })
					}
				} catch(e) {
					this.formErrors = e.response.data.errors
				}
			}
		},
	}
</script>