import Home from '@/pages/Home.vue';
import Blog from '@/pages/Blog.vue';
import BlogAdd from '@/pages/BlogAdd.vue';
import BlogEdit from '@/pages/BlogEdit.vue';
import LinkAdd from '@/pages/LinkAdd.vue';
import Login from '@/pages/Login.vue';

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
	{
		path: "/blog_edit/:id",
		component: BlogEdit,
	},
	{
		path: "/link/add",
		component: LinkAdd,
	},
	{
		path: "/login",
		component: Login,
	},
];

export default routes;