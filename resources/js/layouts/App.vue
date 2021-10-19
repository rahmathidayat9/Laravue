<template>
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <router-link class="navbar-brand" :to="{ name: 'home' }">LARAVUE-BLOG</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <router-link :to="{ name: 'home' }" exact class="nav-link">Home</router-link> 
      </li>
      <li class="nav-item">
        <router-link :to="{ name: 'about' }" class="nav-link">About</router-link>
      </li>
      <li class="nav-item">
        <router-link :to="{ name: 'posts.index' }" class="nav-link">Posts</router-link>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{currentUser.name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- content -->
<div class="container mt-5">
	<router-view></router-view>
</div>
</div>
</template>

<script>
	export default {
    data() {
      return {
        currentUser: {},
        token: localStorage.getItem('token')
      }
    },

    mounted() {
      window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
      // axios.get('/api/user').then((response) => {
      //   this.currentUser = response.data
      // }).catch((error) => {
      //   console.log(error)
      // })
      this.getCurrentUser()
    },

    methods: {
      logout() {
        axios.post('/api/logout').then((response) => {
          localStorage.removeItem('token')
          this.$router.push({ name: 'login' })
        })
      },

      async getCurrentUser() {
        let response = await axios.get('/api/user')
        this.currentUser = response.data
      }
    },
	}
</script>