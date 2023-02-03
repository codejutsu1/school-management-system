<div>
    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
        <select wire:model.lazy="classes">
            <option value="" selected>~ Selected ~</option>
            <option value="jss1a">JSS1A</option>
            <option value="jss1b">JSS1B</option>
        </select>
    </form>
</div>
