<template>
<div>
    <form @submit.prevent="Save">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" v-model="form.title" class="form-control" id="title" placeholder="your title">
            <span style="color:red" v-if="errors.title">{{errors.title[0]}}</span>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Content</label>
            <textarea class="form-control" v-model="form.desc" id="desc" rows="3"></textarea>
            <span style="color:red" v-if="errors.desc">{{errors.desc[0]}}</span>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</div>
</template>

<script>
export default {
    name: "Create",
    data(){
        return{
           form : {
               title : '',
               desc : '',
           },
            errors : {}
        }
    },
    methods:{
        Save(){
            // axios.post('/posts',{
            //     title : this.title,
            //     desc : this.desc
            // }).then(res => {
            //     console.log(res.data)
            // }).catch(error => {
            //
            // })
            this.$toast('bottom');
            axios.post('/posts',this.form).then(res => {
                this.form = {}
                this.errors = {}
                this.$root.$emit('refreshTable')
            }).catch(error => {
                console.log(error)
                this.errors = error.response.data.errors
            })
        }
    }
}
</script>

<style scoped>

</style>
