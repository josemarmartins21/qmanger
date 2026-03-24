@extends('layouts.main')


@section('title', 'Perfil do Utilizador')


@section('content') 
    <section id="users-show" class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Profile Card -->
            <x-dashboard.content class="overflow-hidden">
                <!-- Background Header -->
                <div class="h-32 bg-slate-600"></div>
                
                <!-- Profile Content -->
                <div class="px-6 py-8 sm:px-8">
                    <!-- Avatar Section -->
                    <div class="flex flex-col gap-y-4 sm:flex-column items-center sm:items-start sm:space-x-8">
                        <div class="mb-6 sm:mb-0">
                            <x-profile.avatar :user="$user" size="lg" />
                        </div>
                        
                        <!-- User Info Section -->
                        <div class="flex-1 w-full ml-0 md:m-0"> 
                            <x-profile.user-info :user="$user" />
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-8"></div>

                    <!-- Permissions Section -->
                    <div class="mb-8">
                        <x-profile.permissions-badge :user="$user" />
                    </div>

                    <!-- Actions Section -->
                    <div class="border-t border-gray-200 pt-8">
                        <x-profile.change-password-button :userId="$user->id" />
                    </div>
                </div>
            </x-dashboard.content>
        </div>
    </section>

    <!-- Change Password Modal -->
    <x-profile.change-password-modal :userId="$user->id" />
@endsection>


