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
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select v-model="form.subject" class="form-control" id="subject">
                                <option value="" selected disabled>-- Please Select One --</option>
                                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea v-model="form.description" class="form-control" id="description" cols="30" rows="10" placeholder="Fill the description.."></textarea>
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
            subjects: []
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
            let response = await axios.post('/api/notes/create-new-notes', this.form);
            if (response.status == 200) {
                // console.log(response.data);
                this.form.title = "";
                this.form.subject = "";
                this.form.description = "";
            }
        }
    }
}
</script>
