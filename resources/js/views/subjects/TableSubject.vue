<template>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-3">Table of Subject</h1>
            <table class="table table-hover">
                <thead>
                    <th>Subject</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr v-for="subject in subjects" :key="subject.id">
                        <td>{{ subject.subject }}</td>
                        <td>{{ subject.slug }}</td>
                        <td>{{ subject.created_at }}</td>
                        <td>
                            <router-link :to="{ name: 'subjects.edit', params: {subjectSlug: subject.slug} }" class="btn btn-warning text-white">Edit</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            subjects: []
        };
    },
    mounted() {
        this.getSubject();
    },
    methods: {
        async getSubject() {
            let response = await axios.get('/api/subjects');
            if (response.status == 200) {
                this.subjects = response.data.data;
            }
        }
    }
}
</script>
