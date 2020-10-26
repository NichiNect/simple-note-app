<template>
<div class="container">
    <h1>{{ note.title }}</h1>
    <small>{{ note.published }} - {{ note.subject }}</small>
    <hr>
    <br>
    {{ note.description }}
</div>
</template>

<script>
export default {
    data() {
        return {
            note: [],
        }
    },
    mounted() {
        this.getNote();
    },
    methods: {
        async getNote() {
            let response = await axios.get('/api/notes/' + this.$route.params.noteSlug);
            this.note = response.data.data;
        }
    }
}
</script>
