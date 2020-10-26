<template>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create New Subject</div>
                <div class="card-body">
                    <form action="" method="post" @submit.prevent="store">
                        <div class="form-group">
                            <label for="subject">Name of Subject</label>
                            <input type="text" v-model="form.subject" id="subject" class="form-control" placeholder="Fill the name of subject..">
                            <small v-if="theErrors.subject" id="error_subject" class="form-text text-danger">{{ theErrors.subject[0] }}</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-dark btn-block">New!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                subject: ''
            },
            theErrors: []
        }
    },
    methods: {
        async store() {
            try {
                let response = await axios.post('/api/subjects/create-new-subject', this.form);
                console.log(response.data);
                if (response.status == 200) {
                    this.form.subject = '';
                    this.theErrors = [];

                    this.$toasted.show(response.data.message, {
                        type: 'success',
                        duration: 3000
                    });
                }
            } catch (e) {
                this.$toasted.show("Something wrong, we can feel it", {
                    type: 'error',
                    duration: 3000
                });

                this.theErrors = e.response.data.errors;
            }
        }
    }
}
</script>
