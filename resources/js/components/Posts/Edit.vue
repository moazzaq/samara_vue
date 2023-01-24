<template>
    <form @submit.prevent="Update">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" v-model="form.title" class="form-control" id="title" placeholder="your title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Content</label>
            <textarea class="form-control" v-model="form.desc" id="desc" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</template>

<script>
export default {
    name: "Edit",
   // props : ['post'],
    data(){
        return{
            form : {
                id : '',
                title : '',
                desc : '',
            }
        }
    },
    created() {
        this.$root.$on('EditPost', (post) => {
                this.form.title = post.post_title
                this.form.desc = post.content
                this.form.id = post.id
        });
    },
    methods:{
        Update(){
            axios.put(`/posts/${this.form.id}`,this.form).then(res => {
                this.$root.$emit('refreshTable')
                this.$root.$emit('hideForm')
            }).catch(error => {

            })
        }
    }
}
</script>

<style scoped>

</style>
