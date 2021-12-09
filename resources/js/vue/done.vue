<template>
    <div>
        <div class="card text-white shadow-sm mt-4 p-3">
            Done
            <p v-if="!doneToDo.length" class="text-muted text-center mt-2 pb-0">No tasks has been done yet.</p>
            <div v-for="(doneItem, index) in doneToDo" :key="index" class="mt-0">
                <done-to-do-item 
                    :done="doneItem" 
                    v-on:todoDone="$emit('reloadTodoList')"
                />
            </div>
        </div>
    </div>
</template>
<script>

import DoneToDoItem from './doneItem';

export default {
    props: ['doneToDo'],
    components: {
        DoneToDoItem
    }
}
</script>