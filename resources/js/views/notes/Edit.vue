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
                            <button type="submit" class="btn btn-outline-dark btn-block">
                                Update
                                <template v-if="loading === true" class="ml-2">
                                    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="28px" height="28px" viewBox="0 0 128 128" xml:space="preserve">
                                        <g>
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#000000" fill-opacity="1" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(45 64 64)" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(90 64 64)" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(135 64 64)" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(180 64 64)" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(225 64 64)" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(270 64 64)" />
                                            <path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0c0c0" fill-opacity="0.25" transform="rotate(315 64 64)" />
                                            <animateTransform attributeName="transform" type="rotate" values="0 64 64;45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64" calcMode="discrete" dur="720ms" repeatCount="indefinite"></animateTransform>
                                        </g>
                                    </svg>
                                </template>
                            </button>
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
            selected: '',
            loading: false
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
            this.loading = true;
            this.form['subject'] = this.selected || this.form.subjectID;

            let response = await axios.patch(`/api/notes/${this.$route.params.noteSlug}/edit`, this.form);
            if (response.status === 200) {
                this.loading = false;
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
