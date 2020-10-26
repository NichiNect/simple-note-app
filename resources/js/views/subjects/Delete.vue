<template>
<button ref="deleteSubject" @click="destroySubject" class="btn btn-danger mx-2">Delete</button>
</template>

<script>
export default {
    props: ['endpoint'],
    methods: {
        async destroySubject() {
            let question = window.confirm('Are you sure?');
            if (question == true) {
                // console.log(this.endpoint);
                let response = await axios.delete(`/api/subjects/${this.endpoint}/delete`);
                if (response.status === 200) {
                    this.$toasted.show(response.data.message, {
                        type: 'success',
                        duration: 3000
                    });
                    // to remove <tr>
                    this.$refs.deleteSubject.parentNode.parentNode.remove();
                }
            }
        }
    }
}
</script>
