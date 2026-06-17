@extends('layouts.main')


@section('title', 'Definições')


@section('content')
    <section id="settings-container">
        <x-dashboard.content>
            <x-dashboard.title-section>Definições</x-dashboard.title-section>

            <x-dashboard.settings-container>
                <x-dashboard.setting>
                    <x-slot:setting>
                        Lorem ipsum, adipisicing.
                    </x-slot:setting>

                    <x-slot:change>
                        <button type="submit" id="btn-theme">
                            X
                        </button>
                    </x-slot:change>
                </x-dashboard.setting>
                <x-dashboard.setting>
                    <x-slot:setting>
                        Lorem ipsum, adipisicing.
                    </x-slot:setting>

                    <x-slot:change>
                        <button type="submit" id="btn-theme">
                            X
                        </button>
                    </x-slot:change>
                </x-dashboard.setting>
                <x-dashboard.setting>
                    <x-slot:setting>
                        Lorem ipsum, adipisicing.
                    </x-slot:setting>

                    <x-slot:change>
                        <button type="submit" id="btn-theme">
                            X
                        </button>
                    </x-slot:change>
                </x-dashboard.setting>
            </x-dashboard.settings-container>
        </x-dashboard.content>
    </section>
@endsection    


