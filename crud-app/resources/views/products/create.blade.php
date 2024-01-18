<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Cadastrar novo produto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="mt-6">    
                     <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Cadastre informações do produto') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Cadastre as informações de um novo produto") }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('create') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Nome do produto')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="qtd" :value="__('Quantidade')" />
                            <x-text-input id="qtd" name="qtd" type="number" class="mt-1 block w-full"  />
                            <x-input-error class="mt-2" :messages="$errors->get('qtd')" />
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Valor unitário')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full"  />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="totalprice" :value="__('Valor total')" />
                            <x-text-input id="totalprice" name="totalprice" type="number" class="mt-1 block w-full"  />
                            <x-input-error class="mt-2" :messages="$errors->get('totalprice')" />
                        </div>

                        <x-primary-button>{{ __('Cadastrar') }}</x-primary-button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 