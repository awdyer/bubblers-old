<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>{{ bubbler.description }}</h4>
            <p>{{ bubbler.park.name }}, {{ bubbler.suburb.name }}</p>
            <em>{{ bubbler.rating }} stars</em>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['bubbler']
    };
</script>