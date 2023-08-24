import Home from '@/pages/Home.vue';
import Blog from '@/pages/Blog.vue';
import BlogAdd from '@/pages/BlogAdd.vue';

const routes = [
	{
		path: "/",
		component: Home,
	},
	{
		path: "/blog/:id",
		component: Blog,
	},
	{
		path: "/blog/add",
		component: BlogAdd,
	},
];

export default routes;