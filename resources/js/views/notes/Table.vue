<template>
<div class="container">
    <h1 class="mb-3">Table of Note</h1>
    <table class="table table-hover">
        <thead>
            <th>Title</th>
            <th>Subject</th>
            <th>Published at</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr v-for="note in notes" :key="note.id">
                <td>
                    <router-link :to="{ name: 'notes.show', params: {noteSlug: note.slug} }">
                        {{ note.title }}
                    </router-link>
                </td>
                <td>{{ note.subject }}</td>
                <td>{{ note.published }}</td>
                <td>
                    <router-link :to="{ name: 'notes.edit', params: {noteSlug: note.slug} }" class="btn btn-warning text-white">Edit</router-link>
                    <delete-note :endpoint="note.slug" />
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import DeleteNote from './Delete';
export default {
    components: {
        'DeleteNote': DeleteNote
    },
    data() {
        return {
            notes: []
        };
    },
    mounted() {
        this.getNotes();
    },
    methods: {
        async getNotes() {
            let response = await axios.get('/api/notes');
            if (response.status === 200) {
                this.notes = response.data.data;
            }
        }
    }
}
</script>
