import Home from '../views/Home';
import About from '../views/About';

import NewNote from '../views/notes/Create';

export default {
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'pages.about',
            component: About,
        },
        {
            path: '/create-new-note',
            name: 'notes.create',
            component: NewNote,
        }
    ]
}