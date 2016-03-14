<template>
<div>
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>{{ bubbler.description }}</h4>
            <p>{{ bubbler.park.name }}, {{ bubbler.suburb.name }}</p>
            <em>{{ bubbler.rating }} stars</em>
        </div>
    </div>
</div>
</template>

<style scoped>
    .panel {
        text-align: center;
    }
</style>

<script type="text/babel">
    export default {
        props: ['bubbler']
    };
</script>