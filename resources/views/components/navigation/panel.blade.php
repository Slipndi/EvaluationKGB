<header>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img 
                            class="h-8 w-8" 
                            src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" 
                            alt="icone"
                        >
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a 
                                href="{{ route('home') }}"" 
                                class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" 
                                arria-current="page"
                            > 
                            Accueil
                            </a>
                            <x-navigation.link href="/missions">Missions</x-menu-link>
                            <x-navigation.link href="/persons">Personnes</x-menu-link>
                            <x-navigation.link href="/hideouts">Planques</x-menu-link>
                            <x-navigation.link href="/initiate-mission">Initier une mission</x-menu-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </nav>
</header>
