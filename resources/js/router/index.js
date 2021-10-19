import Home from '../views/Home'
import About from '../views/About'
import Login from '../views/Login'
import PostsIndex from '../views/posts/Index'
import PostsCreate from '../views/posts/Create'
import PostsEdit from '../views/posts/Edit'

export default {
	mode: 'history',
	linkActiveClass: 'active',

	routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
			beforeEach: ((to, from, next) => {
				if (loggedIn) {
					next()
				}else{
					this.$router.push({ name: 'login' })
				}
			})
		},
		{
			path: '/about',
			name: 'about',
			component: About,
			beforeEach: ((to, from, next) => {
				if (loggedIn) {
					next()
				}else{
					this.$router.push({ name: 'login' })
				}					
			})
		},
		{
			path: '/login',
			name: 'login',
			component: Login,
			beforeEach: ((to, from, next) => {
				if (loggedIn) {
					this.$router.push({ name: 'posts' })
				}else{
					next()
				}
			})
		},
		{
			path: '/posts',
			name: 'posts.index',
			component: PostsIndex,
			beforeEach: ((to, from, next) => {
				if (loggedIn) {
					next()
				}else{
					this.$router.push({ name: 'login' })
				}	
			})
		},
		{
			path: '/posts/create',
			name: 'posts.create',
			component: PostsCreate,
			beforeEach: ((to, from, next) => {
				if (loggedIn) {
					next()
				}else{
					this.$router.push({ name: 'login' })
				}	
			})
		},
		{
			path: '/posts/:id/edit',
			name: 'posts.edit',
			component: PostsEdit,
			beforeEach: ((to, from, next) => {
				if (loggedIn) {
					next()
				}else{
					this.$router.push({ name: 'login' })
				}	
			})
		}
	]
}