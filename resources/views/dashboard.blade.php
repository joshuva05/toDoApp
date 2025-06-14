<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Task Status Overview') }}</h3>
                            <canvas id="myChart"></canvas>
                        </div>
                    <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200">{{ __('Total Tasks') }}</h3>
                        <p class="text-2xl font-bold">{{ $taskCount }}</p>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-green-800 dark:text-green-200">{{ __('Completed Tasks') }}</h3>
                        <p class="text-2xl font-bold">{{ $taskCountByStatus['completed'] ?? 0 }}</p>
                    </div>
                    <div class="bg-yellow-100 dark:bg-yellow-900 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200">{{ __('Pending Tasks') }}</h3>
                        <p class="text-2xl font-bold">{{ $taskCountByStatus['pending'] ?? 0 }}</p>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">{{ __('Overdue Tasks') }}</h3>
                        <p class="text-2xl font-bold">{{ $taskCountByStatus['overdue'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
    ctx.height = 400;
    ctx.width = 400;
    ctx.style.width = '100%';
    ctx.style.height = '400px';
    ctx.style.maxWidth = '400px';
    ctx.style.maxHeight = '400px';
    ctx.style.margin = '0 auto';

  new Chart(ctx, {

    type: 'pie',
    data: {
      labels: ['Complete', 'Pending', 'Overdue'],
      datasets: [{
        label: 'Tasks',
        data: [
          {{ $taskCountByStatus['completed'] ?? 0 }},
          {{ $taskCountByStatus['pending'] ?? 0 }},
          {{ $taskCountByStatus['overdue'] ?? 0 }}
        ],
         hoverOffset: 4
      }]
    },

  });
</script>
