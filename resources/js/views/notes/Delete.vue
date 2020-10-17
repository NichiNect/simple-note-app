<template>
<button ref="deleteNote" @click="destroyNote" class="btn btn-danger mx-2">Delete</button>
</template>

<script>
export default {
    props: ['endpoint'],
    methods: {
        async destroyNote() {
            let question = window.confirm('Are you sure?');
            if (question == true) {
                let response = await axios.delete(`/api/notes/${this.endpoint}/delete`);
                if (response.status === 200) {
                    this.$toasted.show(response.data.message, {
                        type: 'success',
                        duration: 3000
                    });
                    // to remove <tr>
                    this.$refs.deleteNote.parentNode.parentNode.remove();
                }
            }
        }
    }
}
</script>
