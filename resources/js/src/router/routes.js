import Home from '@/pages/Home.vue';
import About from '@/pages/About.vue';
import BlogPage from '@/pages/BlogPage.vue';

const routes = [
	{
		path: "/",
		component: Home,
	},
	{
		path: "/blog/:id",
		component: BlogPage,
	},
	// {
	// 	path: '/about',
	// 	component: About,
	// },
];

export default routes;