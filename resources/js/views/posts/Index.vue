<template>
<div>
	<div>
		<router-link :to="{ name: 'posts.create' }" class="btn btn-success btn-sm mb-4">
			CREATE NEW POSTS
		</router-link>
		
		<vue-good-table
	      :columns="columns"
	      :rows="rows"
	      :search-options="{
		    enabled: true,
		    }"
		  :pagination-options="{
		    enabled: true,
		    mode: 'records',
		    perPage: 5,
			}">
		<template slot="table-row" slot-scope="props">
	      <span v-if="props.column.field == 'action'">
	      	<router-link class="btn btn-primary btn-sm" 
	      	:to="{ name: 'posts.edit', params: {id:props.row.id} }">
	      	EDIT
	      	</router-link>
	        <!-- <button class="btn btn-primary btn-sm" @click="editData(props.row.id)">EDIT</button> -->
	        <button class="btn btn-danger btn-sm" @click="deleteData(props.row.id)">DELETE</button>
	      </span>
	      <span v-else>
	        {{props.formattedRow[props.column.field]}}
	      </span>
	    </template>
		</vue-good-table>
	</div>
</div>
</template>

<script>
	// import the styles
	import 'vue-good-table/dist/vue-good-table.css'
	import { VueGoodTable } from 'vue-good-table';
	import Swal from 'sweetalert2'

	export default {
		name: 'PostsIndex',
		components: {
		  VueGoodTable,
		},

		data() {
			return {
				columns: [
		        {
		          label: 'Title',
		          field: 'title',
		        },
		        {
		          label: 'Action',
		          field: 'action',
		        },
		      ],
		      rows: [],
			}
		},

		mounted() {
			this.getAllData()
		},

		methods: {
			async getAllData() {
				let response = await axios.get('/api/posts')
				this.rows = response.data.data
			},

			async deleteData(id) {
				await Swal.fire({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.isConfirmed) {
				    let response = axios.delete('/api/posts/'+id)
					this.getAllData()
					Swal.fire(
				      response.data.message,
				      '',
				      'success'
				    )
				  }
				})
			}
		},
	}
</script>