<template>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit the Subject</div>
                <div class="card-body">
                    <form action="" method="post" @submit.prevent="update">
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
            form: []
        }
    }

}
</script>
