<template >
    <div>
        <div class="d-flex justify-content-between align-items-center in-progress p-2">
            <div class="d-flex justify-content-start align-items-center">
                <input 
                    type="checkbox" 
                    @change="updateStatus()"
                />
                <span class="ms-3">{{inProgressItem.tasks}} - ( {{inProgressItem.employee_name}} )</span>
            </div>
            <div>
                &nbsp;
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['inProgressItem'],
    methods: {
        updateStatus(){

            axios.post('api/todo/update/' + this.inProgressItem.task_id, {
                todo: this.inProgressItem
            })
            .then(response => {
                if(response.status === 200)
                {
                    this.$parent.$parent.getToDoInProgress();
                    this.$parent.$parent.getDoneToDos();
                }
            })
            .catch(error => {
                alert('Message : ' + error.message);
            })
        }
    },
}
</script>