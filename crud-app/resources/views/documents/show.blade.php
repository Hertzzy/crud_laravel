<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Editar documento
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="mt-6">    
                     <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edite informações do documento') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Cadastre as informações do documento") }}
                            </p>
                        </header>

                       <form action="/documents/update/{{ $document->id }}" method="POST" class="mt-6 space-y-6 -mb-2" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="uploadDoc" :value="__('Substituir Arquivo')" />
                            <input type="file" name="uploadDoc" id="uploadDoc">
                            <br>
                            <a href="/docs/documentos/{{ $document->uploadDoc }}" target="_blank" >Click aqui para Visualizar: <p class="styles">{{$document->uploadDoc }}</p></a>
                        </div>

                        

                        <div>
                            <x-input-label for="documentType" :value="__('Tipo do documento')" />
                            <select name="documentType" id="documentType" class="mt-1 block w-full border-gray-300 rounded-md border border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" required>
                                <option class="text-slate-300" value="{{ $document->documentType }}">{{ $document->documentType }}</option>
                                <option class="text-slate-300" value="processo">Processo</option>
                                <option class="text-slate-300" value="prontuario">Prontuário</option>
                                <option class="text-slate-300" value="arquivo">Arquivo</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('documentType')" />
                        </div>

                        <div>
                            <x-input-label for="documentCode" :value="__('Número de Identificação do documento')" />
                            <input id="documentCode" name="documentCode" type="text" class="mt-1 block w-full border-gray-300 rounded-md border border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Código do documento" value="{{ $document->documentCode }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('documentCode')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Nome completo')" />
                            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md border border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Nome completo" value="{{ $document->name }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="documentCpf" :value="__('CPF')" />
                            <input id="documentCpf" name="documentCpf" type="text" class="mt-1 block w-full border-gray-300 rounded-md border border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"  maxlength="11" placeholder="000.000.000-00" value="{{ $document->documentCpf }}"/>

                            <script>
                                $(document).ready(function () {
                                    $('#documentCpf').mask('000.000.000-00', {reverse: true});
                                });
                            </script>

                            <x-input-error class="mt-2" :messages="$errors->get('documentCpf')" />
                        </div>

                         <div>
                            <x-input-label for="documentRg" :value="__('RG')" />
                            <input id="documentRg" name="documentRg" type="text" class="mt-1 block w-full border-gray-300 rounded-md border border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"  maxlength="11" placeholder="00.000.000-0" value="{{ $document->documentRg }}"/>

                            <script>
                                $(document).ready(function () {
                                    $('#documentRg').mask('00.000.000-0', {reverse: true});
                                });
                            </script>
                            <x-input-error class="mt-2" :messages="$errors->get('documentCpf')" />
                        </div>

                        <div>
                            <x-input-label for="documentDate" :value="__('Data do documento')" />
                            <x-text-input id="documentDate" name="documentDate" type="date" class="mt-1 block w-full"  value="{{ $document->documentDate }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('documentDate')" />
                        </div>

                        {{-- <x-primary-button >{{ __('Cadastrar') }}</x-primary-button> --}}
                        <x-primary-button >{{ __('Cadastrar') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 