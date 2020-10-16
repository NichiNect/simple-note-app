<template>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create New Note</div>
                <div class="card-body">
                    <form action="#" method="post" @submit.prevent="store">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" v-model="form.title" class="form-control" id="title" placeholder="Fill the title..">
                            <small v-if="theErrors.title" id="error_title" class="form-text text-danger">{{ theErrors.title[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select v-model="form.subject" class="form-control" id="subject">
                                <option value="" selected disabled>-- Please Select One --</option>
                                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
                            </select>
                            <small v-if="theErrors.subject" id="error_subject" class="form-text text-danger">{{ theErrors.subject[0] }}</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea v-model="form.description" class="form-control" id="description" cols="30" rows="10" placeholder="Fill the description.."></textarea>
                            <small v-if="theErrors.description" id="error_description" class="form-text text-danger">{{ theErrors.description[0] }}</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-outline-dark btn-block">New Article</button>
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
                title: '',
                subject: '',
                description: ''
            },
            subjects: [],
            theErrors: []
        }
    },

    mounted() {
        this.getSubjects();
    },

    methods: {
        async getSubjects() {
            let response = await axios.get('/api/subjects');
            if (response.status === 200) {
                this.subjects = response.data;
            }
        },
        async store() {
            try {
                let response = await axios.post('/api/notes/create-new-notes', this.form);
                if (response.status == 200) {
                    // console.log(response.data);
                    this.form.title = "";
                    this.form.subject = "";
                    this.form.description = "";
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
