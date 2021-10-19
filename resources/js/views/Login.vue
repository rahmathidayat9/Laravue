<template>
	<div>
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<div class="card">
					<div class="card-header">LOGIN</div>
					<div class="card-body">
						<form method="post" action="#" @submit.prevent="login">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="" name="email" v-model="form.email" id="email" class="form-control">
								<div v-if="formErrors.email" class="text-danger mt-2">
									{{ formErrors.email[0] }}
								</div>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" v-model="form.password" id="password" class="form-control">
								<div v-if="formErrors.password" class="text-danger mt-2">
									{{ formErrors.password[0] }}
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">LOGIN</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				form: {
					email: '',
					password: '',
					device_name: 'browser',
				},

				formErrors: [],
			}
		},

		methods: {
			login() {
				axios.post('/api/login', this.form).then((response) => {
					localStorage.setItem('token', response.data)
					this.$router.push({ name: 'posts.index' })
				}).catch((error) => {
					this.formErrors = error.response.data.errors
				})
			}
		}
	}
</script>