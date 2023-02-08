<div>
    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
        <select wire:model.lazy="classes">
            <option value="" selected>~ Selected ~</option>
            <option value="jss1a">JSS1A</option>
            <option value="JSS1B">JSS1B</option>
        </select>

        <select wire:model.lazy="session">
            <option value="" selected>~ Selected ~</option>
            <option value="2020/2021">2020/2021</option>
            <option value="2021/2022">2021/2022</option>
        </select>
    </form>

    <p>{{ $classes }}</p>
    <p>{{ $session }}</p>

    <p>{{ $students }}</p>
</div>
