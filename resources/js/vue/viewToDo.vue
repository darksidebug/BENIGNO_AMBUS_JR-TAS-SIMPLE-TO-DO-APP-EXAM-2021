<template>
    <div>
        <div class="card text-white shadow-sm mt-4 p-3">
            <span class="textWarning">ToDo Lists</span>
            <div v-for="(todo, index) in todos" :key="index" class="mt-0">
                <item-view 
                    :todo="todo" 
                />
            </div>
            <p v-if="!todos.length" class="text-muted text-center mt-2 pb-0">No task added yet.</p>
        </div>
    </div>
</template>
<script>

import ItemView from './itemToDo';

export default {
    props:['todos'],
    components: {
        ItemView
    }
}
</script>