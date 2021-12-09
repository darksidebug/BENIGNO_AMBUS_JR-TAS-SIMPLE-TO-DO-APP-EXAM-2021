<template>
    <div>
        <div class="card text-white shadow mt-4 p-3">
            <span class="textSuccess">In Progress</span>
            <p v-if="!inProgress.length" class="text-muted text-center mt-2 pb-0">No tasks yet.</p>
            <div v-for="(inProgressItem, index) in inProgress" :key="index" class="mt-0">
                <in-progress-item 
                    :inProgressItem="inProgressItem" 
                    v-on:todoChange="$emit('reloadDoneToDos')"
                />
            </div>
        </div>
    </div>
</template>
<script>

import InProgressItem from './inProgressItem'

export default {
    props:['inProgress'],
    components:{
        InProgressItem
    }
}
</script>