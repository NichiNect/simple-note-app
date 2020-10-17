<template>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create New Note</div>
                <div class="card-body">
                    <form action="#" method="post" @submit.prevent="update">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" v-model="form.title" class="form-control" id="title" placeholder="Fill the title..">
                            <small v-if="theErrors.title" id="error_title" class="form-text text-danger">{{ theErrors.title[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select @change="selectedSubject" class="form-control" id="subject">
                                <option :value="form.subjectID" v-text="form.subject"></option>
                                <template v-for="subject in subjects">
                                    <option v-if="form.subjectID !== subject.id" :key="subject.id" :value="subject.id">
                                        {{ subject.name }}
                                    </option>
                                </template>
                            </select>
                            <small v-if="theErrors.subject" id="error_subject" class="form-text text-danger">{{ theErrors.subject[0] }}</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea v-model="form.description" class="form-control" id="description" cols="30" rows="10" placeholder="Fill the description.."></textarea>
                            <small v-if="theErrors.description" id="error_description" class="form-text text-danger">{{ theErrors.description[0] }}</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-outline-dark btn-block">Save</button>
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
            form: [],
            subjects: [],
            theErrors: [],
            selected: ''
        }
    },

    mounted() {
        this.getSubjects();
        this.getNote();
    },

    methods: {
        async getSubjects() {
            let response = await axios.get('/api/subjects');
            if (response.status === 200) {
                this.subjects = response.data;
            }
        },
        async getNote() {
            let response = await axios.get(`/api/notes/${this.$route.params.noteSlug}`);
            this.form = response.data.data;
        },
        async selectedSubject(e) {
            this.selected = e.target.value;
        },
        async update() {
            this.form['subject'] = this.selected || this.form.subjectID;

            let response = await axios.patch(`/api/notes/${this.$route.params.noteSlug}/edit`, this.form);
            if (response.status === 200) {
                this.$toasted.show(response.data.message, {
                    type: 'success',
                    duration: 3000
                });
            }
            this.$router.push('/notes/table');
        }
    }
}
</script>
