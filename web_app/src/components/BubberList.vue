<template>
<div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <bubbler-panel
                    v-for="bubbler in bubblers"
                    :bubbler="bubbler">
            </bubbler-panel>
        </div>
    </div>
</div>
</template>

<script type="text/babel">
    import BubblerPanel from './BubblerPanel';
    import bubblerStore from '../Bubblers/bubblerStore';

    export default {
        data() {
            return {
                bubblers: []
            };
        },
        components: { BubblerPanel },
        created() {
            bubblerStore.fetchAll()
                .then(res => {
                    this.bubblers = res.data.data;
                });
        }
    };
</script>