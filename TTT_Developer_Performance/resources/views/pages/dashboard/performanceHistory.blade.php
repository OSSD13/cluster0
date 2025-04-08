@extends('layouts.tester')

@section('title')
    <title>Performance History</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Performance History</p>
    </div>
@endsection

@section('contents')
<div class="flex justify-between items-center mb-4">
    <div class="text-2xl font-bold text-blue-900">
        <p>Performance History</p>
    </div>
    <!-- Dropdown Filters -->
    <div class="flex gap-4 ml-4">

        <!-- Year Dropdown -->
        <div class="relative">
            <button id="dropdownYear"
                class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                <span id="dropdownYearSelected" class="truncate text-center w-full">Year:</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdownYearMenu"
                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="year2568" value="2568" class="mr-2">
                    <label for="year2568" class="text-black">2568</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="year2567" value="2567" class="mr-2">
                    <label for="year2567" class="text-black">2567</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="year2566" value="2566" class="mr-2">
                    <label for="year2566" class="text-black">2566</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="year2565" value="2565" class="mr-2">
                    <label for="year2565" class="text-black">2565</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="year2564" value="2564" class="mr-2">
                    <label for="year2564" class="text-black">2564</label>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdownYear = document.getElementById('dropdownYear');
                const dropdownYearMenu = document.getElementById('dropdownYearMenu');
                const dropdownYearSelected = document.getElementById('dropdownYearSelected');
                const yearCheckboxes = dropdownYearMenu.querySelectorAll('input[type="checkbox"]');

                dropdownYear.addEventListener('click', function() {
                    dropdownYearMenu.classList.toggle('hidden');
                });

                yearCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const selectedYears = Array.from(yearCheckboxes)
                            .filter(cb => cb.checked)
                            .map(cb => cb.value)
                            .join(', ');
                        dropdownYearSelected.textContent = `Year: ${selectedYears}`;
                    });
                });

                document.addEventListener('click', function(event) {
                    if (!dropdownYear.contains(event.target) && !dropdownYearMenu.contains(event.target)) {
                        dropdownYearMenu.classList.add('hidden');
                    }
                });
            });
        </script>

        <!-- Sprint Dropdown -->
        <div class="relative">
            <button id="dropdownSprint"
                class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                <span id="dropdownSprintSelected" class="truncate text-center w-full">Sprint:</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdownSprintMenu"
                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="sprint1" value="Sprint 1" class="mr-2">
                    <label for="sprint1" class="text-black">Sprint 1</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="sprint2" value="Sprint 2" class="mr-2">
                    <label for="sprint2" class="text-black">Sprint 2</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="sprint3" value="Sprint 3" class="mr-2">
                    <label for="sprint3" class="text-black">Sprint 3</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="sprint4" value="Sprint 4" class="mr-2">
                    <label for="sprint4" class="text-black">Sprint 4</label>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdownSprint = document.getElementById('dropdownSprint');
                const dropdownSprintMenu = document.getElementById('dropdownSprintMenu');
                const dropdownSprintSelected = document.getElementById('dropdownSprintSelected');
                const sprintCheckboxes = dropdownSprintMenu.querySelectorAll('input[type="checkbox"]');

                dropdownSprint.addEventListener('click', function() {
                    dropdownSprintMenu.classList.toggle('hidden');
                });

                sprintCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const selectedSprints = Array.from(sprintCheckboxes)
                            .filter(cb => cb.checked)
                            .map(cb => cb.value)
                            .join(', ');
                        dropdownSprintSelected.textContent = `Sprint: ${selectedSprints}`;
                    });
                });

                document.addEventListener('click', function(event) {
                    if (!dropdownSprint.contains(event.target) && !dropdownSprintMenu.contains(event.target)) {
                        dropdownSprintMenu.classList.add('hidden');
                    }
                });
            });
        </script>


        <!-- Team Dropdown -->
        <div class="relative">
            <button id="dropdownTeam"
                class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                <span id="dropdownTeamSelected" class="truncate text-center w-full">Team:</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdownTeamMenu"
                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="allTeams" value="All Teams" class="mr-2">
                    <label for="allTeams" class="text-black">All Teams</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="team1" value="Team 1" class="mr-2">
                    <label for="team1" class="text-black">Team 1</label>
                </div>
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="team2" value="Team 2" class="mr-2">
                    <label for="team2" class="text-black">Team 2</label>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdownTeam = document.getElementById('dropdownTeam');
                const dropdownTeamMenu = document.getElementById('dropdownTeamMenu');
                const dropdownTeamSelected = document.getElementById('dropdownTeamSelected');
                const teamCheckboxes = dropdownTeamMenu.querySelectorAll('input[type="checkbox"]');
                const allTeamsCheckbox = document.getElementById('allTeams');

                dropdownTeam.addEventListener('click', function() {
                    dropdownTeamMenu.classList.toggle('hidden');
                });

                allTeamsCheckbox.addEventListener('change', function() {
                    const isChecked = allTeamsCheckbox.checked;
                    teamCheckboxes.forEach(checkbox => {
                        if (checkbox !== allTeamsCheckbox) {
                            checkbox.checked = isChecked;
                        }
                    });
                    updateSelectedTeams();
                });

                teamCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        if (checkbox !== allTeamsCheckbox) {
                            allTeamsCheckbox.checked = Array.from(teamCheckboxes)
                                .filter(cb => cb !== allTeamsCheckbox)
                                .every(cb => cb.checked);
                        }
                        updateSelectedTeams();
                    });
                });

                function updateSelectedTeams() {
                    const selectedTeams = Array.from(teamCheckboxes)
                        .filter(cb => cb.checked && cb !== allTeamsCheckbox)
                        .map(cb => cb.value)
                        .join(', ');
                    dropdownTeamSelected.textContent = selectedTeams ? `Team: ${selectedTeams}` : 'Team:';
                }

                document.addEventListener('click', function(event) {
                    if (!dropdownTeam.contains(event.target) && !dropdownTeamMenu.contains(event.target)) {
                        dropdownTeamMenu.classList.add('hidden');
                    }
                });
            });
        </script>

        <!-- Member Dropdown -->
        <div class="relative">
            <button id="dropdownMember"
                class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                <span id="dropdownMemberSelected" class="truncate text-center w-full">Member:</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdownMemberMenu"
                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                <div class="flex items-center px-4 py-2">
                    <input type="checkbox" id="member01" value="Member 01" class="mr-2">
                    <label for="member01" class="text-black">Member 01</label>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdownMember = document.getElementById('dropdownMember');
                const dropdownMemberMenu = document.getElementById('dropdownMemberMenu');
                const dropdownMemberSelected = document.getElementById('dropdownMemberSelected');
                const memberCheckboxes = dropdownMemberMenu.querySelectorAll('input[type="checkbox"]');

                dropdownMember.addEventListener('click', function() {
                    dropdownMemberMenu.classList.toggle('hidden');
                });

                memberCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const selectedMembers = Array.from(memberCheckboxes)
                            .filter(cb => cb.checked)
                            .map(cb => cb.value)
                            .join(', ');
                        dropdownMemberSelected.textContent = `Member: ${selectedMembers}`;
                    });
                });

                document.addEventListener('click', function(event) {
                    if (!dropdownMember.contains(event.target) && !dropdownMemberMenu.contains(event.target)) {
                        dropdownMemberMenu.classList.add('hidden');
                    }
                });
            });
        </script>
    </div>
</div>
<!-- Table -->
<div class="relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <!-- Table header -->
        <thead class="border-t border-gray-400 text-sm text-gray-400 uppercase border-b ">
            <tr>
            <th scope="col" class="px-2 py-4 text-center text-xs">#</th>
            <th scope="col" class="px-2 py-4 text-center text-xs">Sprint</th>
            <th scope="col" class="px-2 py-4 text-center text-xs">Team</th>
            <th scope="col" class="px-2 py-4 text-center text-xs">Member</th>
            <th scope="col" class="px-0 py-4 text-center flex items-center justify-center gap-1 text-xs">
                Personal Point
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            <th scope="col" class="px-0 py-4 text-center text-xs">Test Pass
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            <th scope="col" class="px-0 py-4 text-center text-xs">Bug
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            <th scope="col" class="px-0 py-4 text-center text-xs">Final Pass Point
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            <th scope="col" class="px-0 py-4 text-center text-xs">Cancel
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            <th scope="col" class="px-0 py-4 text-center text-xs">Sum Final
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            <th scope="col" class="px-0 py-4 text-center text-xs">Finish Date
                <svg class="inline w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
            </th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 ">
                <th class="px-8 py-5 text-center text-black font-light whitespace-nowrap">1</th>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">67-52</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">Team 2</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">Steve</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">10</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">10</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">0</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">100.00%</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">0</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">10</td>
                <td class="px-8 py-5 text-center text-black whitespace-nowrap">23/07/2004</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('javascripts')
    <script></script>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        #navbar-title {
            font-family: "Jaro", sans-serif;
            line-height: 25px;
            letter-spacing: 0.5px;
        }

        body {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection



-- MySQL Script generated by MySQL Workbench
-- Tue Apr  8 09:24:07 2025
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cluster0
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cluster0
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cluster0` DEFAULT CHARACTER SET utf8 ;
USE `cluster0` ;

-- -----------------------------------------------------
-- Table `cluster0`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`users` (
  `usr_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usr_username` VARCHAR(100) NOT NULL,
  `usr_password` VARCHAR(255) NOT NULL,
  `usr_email` VARCHAR(100) NULL,
  `usr_name` VARCHAR(45) NOT NULL,
  `usr_trello_fullname` VARCHAR(100) NULL,
  `usr_role` ENUM('Developer', 'Tester') NULL,
  `usr_is_use` TINYINT(1) UNSIGNED NOT NULL,
  `usr_google_id` VARCHAR(100) NULL,
  PRIMARY KEY (`usr_id`),
  UNIQUE INDEX `use_username_UNIQUE` (`usr_username` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`setting_trello`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`setting_trello` (
  `stl_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `stl_name` VARCHAR(45) NOT NULL,
  `stl_todo` VARCHAR(45) NOT NULL,
  `stl_inprogress` VARCHAR(45) NOT NULL,
  `stl_done` VARCHAR(45) NOT NULL,
  `stl_bug` VARCHAR(45) NOT NULL,
  `stl_minor_case` VARCHAR(45) NOT NULL,
  `stl_cancel` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`stl_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`trello_credentials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`trello_credentials` (
  `trc_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `trc_api_key` BLOB NOT NULL,
  `trc_api_token` BLOB NOT NULL,
  PRIMARY KEY (`trc_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`teams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`teams` (
  `tm_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tm_name` VARCHAR(45) NOT NULL,
  `tm_trello_boardname` VARCHAR(100) NOT NULL,
  `tm_is_use` TINYINT(1) UNSIGNED NOT NULL,
  `tm_stl_id` INT UNSIGNED NOT NULL,
  `tm_trc_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`tm_id`),
  UNIQUE INDEX `tea_name_UNIQUE` (`tm_name` ASC) VISIBLE,
  INDEX `fk_teams_setting_trello1_idx` (`tm_stl_id` ASC) VISIBLE,
  INDEX `fk_teams_trello_credentials1_idx` (`tm_trc_id` ASC) VISIBLE,
  CONSTRAINT `fk_teams_setting_trello1`
    FOREIGN KEY (`tm_stl_id`)
    REFERENCES `cluster0`.`setting_trello` (`stl_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_teams_trello_credentials1`
    FOREIGN KEY (`tm_trc_id`)
    REFERENCES `cluster0`.`trello_credentials` (`trc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`cards`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`cards` (
  `crd_id` INT NOT NULL AUTO_INCREMENT,
  `crd_trc_id` INT UNSIGNED NOT NULL,
  `crd_trello_id` VARCHAR(100) NOT NULL,
  `crd_boardname` VARCHAR(100) NOT NULL,
  `crd_listname` VARCHAR(45) NOT NULL,
  `crd_title` VARCHAR(100) NOT NULL,
  `crd_detail` TEXT NULL,
  `crd_member_fullname` VARCHAR(100) NOT NULL,
  `crd_point` DOUBLE UNSIGNED NOT NULL,
  PRIMARY KEY (`crd_id`),
  INDEX `fk_cards_trello_credentials1_idx` (`crd_trc_id` ASC) VISIBLE,
  CONSTRAINT `fk_cards_trello_credentials1`
    FOREIGN KEY (`crd_trc_id`)
    REFERENCES `cluster0`.`trello_credentials` (`trc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`user_team_history`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`user_team_history` (
  `uth_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uth_usr_id` INT UNSIGNED NOT NULL,
  `uth_tm_id` INT UNSIGNED NOT NULL,
  `uth_start_date` DATE NOT NULL,
  `uth_end_date` DATE NULL,
  `uth_is_current` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`uth_id`, `uth_usr_id`, `uth_tm_id`),
  INDEX `fk_users_has_teams_teams1_idx` (`uth_tm_id` ASC) VISIBLE,
  INDEX `fk_users_has_teams_users_idx` (`uth_usr_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_has_teams_users`
    FOREIGN KEY (`uth_usr_id`)
    REFERENCES `cluster0`.`users` (`usr_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_teams_teams1`
    FOREIGN KEY (`uth_tm_id`)
    REFERENCES `cluster0`.`teams` (`tm_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`sprints`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`sprints` (
  `spr_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `spr_year` INT UNSIGNED NOT NULL,
  `spr_number` TINYINT UNSIGNED NOT NULL,
  `spr_date_start` DATE NOT NULL,
  `spr_date_finish` DATE NULL,
  `spr_created_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`spr_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`backlogs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`backlogs` (
  `blg_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `blg_pass_point` DOUBLE NOT NULL,
  `blg_personal_point` DOUBLE NOT NULL,
  `blg_bug` DOUBLE NOT NULL,
  `blg_cancel` DOUBLE NOT NULL,
  `blg__is_use` TINYINT(1) NOT NULL,
  PRIMARY KEY (`blg_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`minor_cases`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`minor_cases` (
  `mnc_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mnc_personal_point` DOUBLE NOT NULL,
  `mnc_card_detail` TEXT NOT NULL,
  `mnc_defect_detail` TEXT NOT NULL,
  `mnc_point` DOUBLE NOT NULL,
  `mnc__is_use` TINYINT(1) NOT NULL,
  PRIMARY KEY (`mnc_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`extra_points`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`extra_points` (
  `ext_id` INT UNSIGNED NOT NULL,
  `ext_value` DOUBLE NOT NULL,
  `ext_is_use` TINYINT(1) NOT NULL,
  PRIMARY KEY (`ext_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cluster0`.`points_current_sprint`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster0`.`points_current_sprint` (
  `pcs_id` INT UNSIGNED NOT NULL,
  `pcs_spr_id` INT UNSIGNED NOT NULL,
  `pcs_cases_mnc_id` INT UNSIGNED NOT NULL,
  `pcs_blg_id` INT UNSIGNED NOT NULL,
  `pcs_ext_id` INT UNSIGNED NOT NULL,
  `pcs_uth_id` INT UNSIGNED NOT NULL,
  `pcs_assign_usr_id` INT UNSIGNED NOT NULL,
  `pcs_pass_point` DOUBLE NOT NULL,
  `pcs_bug_point` DOUBLE NOT NULL,
  `pcs_cancel` DOUBLE NOT NULL,
  `pcs_day_off` TINYINT NOT NULL AUTO_INCREMENT,
  `pcs_is_use` TINYINT(1) NOT NULL,
  PRIMARY KEY (`pcs_id`),
  INDEX `fk_points_current_sprint_sprints1_idx` (`pcs_spr_id` ASC) VISIBLE,
  INDEX `fk_points_current_sprint_minor_cases1_idx` (`pcs_cases_mnc_id` ASC) VISIBLE,
  INDEX `fk_points_current_sprint_backlogs1_idx` (`pcs_blg_id` ASC) VISIBLE,
  INDEX `fk_points_current_sprint_extra_points1_idx` (`pcs_ext_id` ASC) VISIBLE,
  INDEX `fk_points_current_sprint_user_team_history1_idx` (`pcs_uth_id` ASC) VISIBLE,
  INDEX `fk_points_current_sprint_users1_idx` (`pcs_assign_usr_id` ASC) VISIBLE,
  CONSTRAINT `fk_points_current_sprint_sprints1`
    FOREIGN KEY (`pcs_spr_id`)
    REFERENCES `cluster0`.`sprints` (`spr_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_points_current_sprint_minor_cases1`
    FOREIGN KEY (`pcs_cases_mnc_id`)
    REFERENCES `cluster0`.`minor_cases` (`mnc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_points_current_sprint_backlogs1`
    FOREIGN KEY (`pcs_blg_id`)
    REFERENCES `cluster0`.`backlogs` (`blg_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_points_current_sprint_extra_points1`
    FOREIGN KEY (`pcs_ext_id`)
    REFERENCES `cluster0`.`extra_points` (`ext_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_points_current_sprint_user_team_history1`
    FOREIGN KEY (`pcs_uth_id`)
    REFERENCES `cluster0`.`user_team_history` (`uth_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_points_current_sprint_users1`
    FOREIGN KEY (`pcs_assign_usr_id`)
    REFERENCES `cluster0`.`users` (`usr_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



