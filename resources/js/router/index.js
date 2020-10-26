import Home from '../views/Home';
import About from '../views/About';

import NewNote from '../views/notes/Create';
import TableNote from '../views/notes/Table';
import ShowNote from '../views/notes/Show';
import EditNote from '../views/notes/Edit';

import TableSubject from '../views/subjects/TableSubject';
import CreateSubject from '../views/subjects/Create';

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
            path: '/notes/create-new-note',
            name: 'notes.create',
            component: NewNote,
        },
        {
            path: '/notes/table',
            name: 'notes.table',
            component: TableNote,
        },
        {
            path: '/notes/:noteSlug',
            name: 'notes.show',
            component: ShowNote,
        },
        {
            path: '/notes/:noteSlug/edit',
            name: 'notes.edit',
            component: EditNote,
        },

        {
            path: '/subjects',
            name: 'subjects.table',
            component: TableSubject,
        },
        {
            path: '/subjects/create-new-subject',
            name: 'subjects.create',
            component: CreateSubject,
        },
    ]
}