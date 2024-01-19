<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Documentos do Sistema
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-3/4 mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 text-gray-900 dark:text-gray-100 mx-auto">
                    <table class="min-w-full divide-gray-200 mx-auto">
                        <thead class="bg-gray-300 ">
                            <tr>
                                 <th class="px-6 text-left text-xs font-light text-gray-500 uppercase ">
                                    Documento
                                </th>
                                <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CPF
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    RG
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data de nascimento
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Visualizar
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                             @foreach ($documents as $document)
                            <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->documentType }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->documentCode }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->documentCpf }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->documentRg }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->documentDate }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        Link...
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="/documents/{{ $document->id }}" class="px-px text-indigo-600 hover:text-indigo-900 ">Editar</a>
                                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Deletar</a>
                                    </td>
                            </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 