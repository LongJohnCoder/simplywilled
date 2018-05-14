import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonalRepresentativeDetailsComponent } from './personal-representative-details.component';

describe('PersonalRepresentativeDetailsComponent', () => {
  let component: PersonalRepresentativeDetailsComponent;
  let fixture: ComponentFixture<PersonalRepresentativeDetailsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PersonalRepresentativeDetailsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonalRepresentativeDetailsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
